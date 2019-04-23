<?php

/**
  * Escapes HTML for output
  *
  */

function ($html) {
  return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

?>
