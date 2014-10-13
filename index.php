<?php require_once 'ascii_table.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>oDesk Test</title>
<style type="text/css">
    @font-face {
        font-family: 'cousineregular';
        src: url('assets/cousine-regular-webfont.eot');
        src: url('assets/cousine-regular-webfont.eot?#iefix') format('embedded-opentype'),
             url('assets/cousine-regular-webfont.woff2') format('woff2'),
             url('assets/cousine-regular-webfont.woff') format('woff'),
             url('assets/cousine-regular-webfont.ttf') format('truetype'),
             url('assets/cousine-regular-webfont.svg#cousineregular') format('svg');
        font-weight: normal;
        font-style: normal;
    }
    body{
                font-family: 'cousineregular';

    }
    span{ color :#fff;line-height: 20px;display: inline-block;}
</style>
</head>

<body>
<?php 
    $table_data = array(
    array(
        'Name' => 'Trixie',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
        ),
    array(
        'Name' => 'Tinkerbell',
        'Element' => 'Air',
        'Likes' => 'Singning',
        'Color' => 'Blue'
        ), 
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Blum',
        'Color' => 'Pink'
        ),
);
    $AT = new ASCIITable($table_data);
    $AT->drawTable();
    
    ?>
</body>

</html>