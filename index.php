<?php
/**
 * VISUALLY IDENTICAL TEXT OBFUSCATOR HOMOGLYPH
 * Uses obfuscated text that's visually mostly identical to the original text entered. Works in almost all web browsers including mobile devices and both GUI and CLI document editors.
 */

// Using only the best, most visually similar cutie characters.
$FINEST_HOMOGLYPHS = [
    'a' => ['а'], // Cyrillic small a
    'c' => ['с'], // Cyrillic small s
    'e' => ['е'], // Cyrillic small e
    'i' => ['і'], // Cyrillic small i
    'j' => ['ј'], // Cyrillic small je
    'o' => ['о'], // Cyrillic small o
    'p' => ['р'], // Cyrillic small er
    's' => ['ѕ'], // Cyrillic small dze
    'y' => ['у'], // Cyrillic small u
    'x' => ['х'], // Cyrillic small kha
    'A' => ['А'], // Cyrillic capital A
    'B' => ['В'], // Cyrillic capital Ve
    'C' => ['С'], // Cyrillic capital Es
    'E' => ['Е'], // Cyrillic capital Ie
    'H' => ['Н'], // Cyrillic capital En
    'I' => ['І'], // Cyrillic capital I
    'J' => ['Ј'], // Cyrillic capital Je
    'K' => ['К'], // Cyrillic capital Ka
    'M' => ['М'], // Cyrillic capital Em
    'O' => ['О'], // Cyrillic capital O
    'P' => ['Р'], // Cyrillic capital Er
    'S' => ['Ѕ'], // Cyrillic capital Dze
    'T' => ['Т'], // Cyrillic capital Te
    'X' => ['Х'], // Cyrillic capital Kha
    'Y' => ['Ү'], // Cyrillic capital Ue
];

$output = "";
$inputText = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text_input'])) {
    $inputText = $_POST['text_input'];
    $obfuscated = "";

    // Convert string to array of UTF-8 characters
    $chars = preg_split('//u', $inputText, -1, PREG_SPLIT_NO_EMPTY);

    foreach ($chars as $char) {
        if (isset($FINEST_HOMOGLYPHS[$char])) {
            // Grab the first match because the list is mostly in order from awesome to slightly less awesome towards the bottom. Or at least thats the way it was when I started. Now it's just awesome.
            $obfuscated .= $FINEST_HOMOGLYPHS[$char][0];
        } else {
            $obfuscated .= $char;
        }
    }
    $output = $obfuscated;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BACKDOORED.RU - Hiding In Plain Sight.</title>

<meta name="twitter:card" content="summary">
<meta property="og:url" content="https://backdoored.ru/">
<meta name="twitter:title" content="BACKDOORED.RU">
<meta name="twitter:description" content="(-_•)╦̵̵̿╤─ BACKDOORED.RU - Hidden In Plain Sight:   ╾━╤デ╦︻ (▀̿ĺ̯▀̿ ̿)"
<meta name="twitter:site" content="@notdan">
<meta name="twitter:creator" content="@notdan">
<meta name="twitter:image" content="https://backdoored.ru/backdoored.ru.logo.144.jpg">
<meta name="twitter:image:alt" content="A Place For Interesting Things To Lie Around, Doomed For Obscurity.">

    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #1a1a1a; color: #e0e0e0; padding: 40px; }
        .container { max-width: 900px; margin: auto; background: #2d2d2d; padding: 25px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
        h2 { color: #00ff41; border-bottom: 1px solid #444; padding-bottom: 10px; }
        textarea { width: 100%; height: 250px; background: #121212; color: #00ff41; border: 1px solid #444; border-radius: 4px; padding: 15px; font-family: "Courier New", monospace; font-size: 14px; resize: vertical; box-sizing: border-box; }
        .btn { background: #00ff41; color: #000; padding: 12px 24px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; margin-top: 15px; transition: background 0.3s; }
        .btn:hover { background: #00cc33; }
        .output-container { margin-top: 30px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #aaa; }
        .copy-hint { font-size: 0.8em; color: #888; margin-top: 5px; }
    </style>
</head>

<body>
<center><img src="mainlogo.jpg" width="950" height="333" alt="BACKDOORED.RU Main Logo">
</center><br>
<div class="container">
    <h2><b><center>[ <font color=white>BACKDOORED.RU</font> ]</b> <br></center>
<center>(-_•)╦̵̵╤─  <font color=white>Hidden In Plain Sight   </font>━╤︻ (▀̿ĺ̯▀̿ ̿)<br></center>
<i><center>    :: Make Your Text More Exciting With The Form Below ::</h2></center></i>
    <form method="POST">
        <label for="text_input">Enter the text you'd like to create a duplicate of that looks visually identical, but isn't. (Large Paste Supported):</label>
        <textarea name="text_input" id="text_input" placeholder="Paste Some Words Here..."><?php echo htmlspecialchars($inputText); ?></textarea>
        <button type="submit" class="btn">TRANSFORM TEXT INTO STEALTH MODE</button>
    </form>

    <?php if ($output): ?>
    <div class="output-container">
        <label for="output_text">Obfuscated Output (Visually Identical):</label>
        <textarea id="output_text" readonly><?php echo htmlspecialchars($output); ?></textarea>
        <label for="output_text">
This text contains Cyrillic homoglyphs. It will look normal to the eye but will fail string matching and automated keyword detection. I hear AI doesn't even really like it too much! It definitely shouldn't be used for evil. ...Or go for it. Who am I to say what you do with it?</label>
<pre><code>
Note: If you wanna verify it's actually different, try this:
echo "Whatever you originally wrote here" | xxd
echo "Whatever you just transformed here" | xxd
</pre></code>

<center><b>©MMXXVI BACKDOORED.RU </b></center>

        <?php endif; ?>
</div>

</body>
</html>
