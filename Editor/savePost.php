<?php
require("../vendor/autoload.php");
include("../Utils/debug.php");

use \EditorJS\EditorJS;

$data = file_get_contents("php://input");
file_put_contents("saved.json", $data);
$configuration = file_get_contents("config.json");

try {
  // Initialize Editor backend and validate structure
  $editor = new EditorJS($data, $configuration);

  // Get sanitized blocks (according to the rules from configuration)
  $blocks = $editor->getBlocks();

  foreach ($blocks as $block) {
    switch ($block["type"]) {
      case "paragraph":
        echo ("<p>" . $block["data"]["text"] . "</p>");
        break;

      case "header":
        $data = $block["data"];
        $headerLevelEnd = "h" . $data["level"] . ">";
        echo ("<" . $headerLevelEnd . $data["text"] . "</$headerLevelEnd");
        break;

      case "list":
        $data = $block["data"];
        $style = "u";
        if ($data["style"] == "ordered") {
          $style = "o";
        }
        echo ("<" . $style . "l>");
        foreach ($data["items"] as $item) {
          echo ("<li>" . $item . "</li>");
        }
        echo ("</" . $style . "l>");
        break;

      case "quote":
        $data = $block["data"];
        echo ("<div class='quote'><p style='text-align: " . $data["alignment"] . "'>" . $data["text"] . "</p>");
        if ($data["caption"] != '') {
          echo ("<span>— " . $data["caption"] . "</span></div>");
        }
        break;
      case "image":
        $data = $block["data"];
        $caption = $data["caption"];
        $background = $data["withBackground"];
        echo ("<div class='image");
        if ($background) {
          echo (" background");
        }
        if ($data["withBorder"]) {
          echo (" border");
        }
        echo ("'><div class='");
        if ($data["withBorder"]) {
          echo ("borderBackground");
        }
        echo ("'><img class='");
        if ($background) {
          echo ("background");
        }
        if ($data["withBorder"]) {
          echo (" borderBackground0");
        }
        if ($data["stretched"]) {
          echo (" stretched");
        }
        echo ("' src='" . $data["url"] . "' alt='$caption'></div>");
        if ($caption != "") {
          echo ("<p>$caption</p>");
        }
        echo ("</div>");
        break;

      default:
        echo ("<p>");
        var_dump($block);
        echo ("</p>");
        break;
    }
  }
} catch (Exception $e) {
  Debug\log($e->getMessage());
}
