param([string]$Src)
$tmp = Join-Path $env:TEMP ("docxx_" + [Guid]::NewGuid().ToString("N"))
New-Item -ItemType Directory -Force -Path $tmp | Out-Null
try {
  Expand-Archive -Path $Src -DestinationPath $tmp -Force
  $xmlPath = Join-Path $tmp 'word\document.xml'
  if (-not (Test-Path $xmlPath)) { return }
  $xml = Get-Content -Raw -Path $xmlPath
  # Replace paragraph closing tags with newlines
  $text = $xml -replace '</w:p>', "`n" -replace '<w:tab/?>', "`t"
  # Strip all remaining XML tags
  $text = [System.Text.RegularExpressions.Regex]::Replace($text, '<[^>]+>', '')
  # Decode XML entities
  $text = $text -replace '&amp;', '&' -replace '&lt;', '<' -replace '&gt;', '>' -replace '&quot;', '"' -replace '&apos;', "'"
  # Collapse multiple blank lines
  $text = [System.Text.RegularExpressions.Regex]::Replace($text, '(\r?\n){3,}', "`n`n")
  Write-Output $text
} finally {
  Remove-Item -Recurse -Force $tmp -ErrorAction SilentlyContinue
}
