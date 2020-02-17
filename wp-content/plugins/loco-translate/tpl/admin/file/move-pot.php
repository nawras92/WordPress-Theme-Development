<?php
/**
 * Confirmation form for moving file or group of files to an exact/custom location.
 * Use for moving POT file, but also moving PO siblings when locale or text domain is unknown
 */
$this->extend('move');
$this->start('source');

/* @var Loco_mvc_FileParams $file */
/* @var Loco_mvc_ViewParams $current */
?> 
    <div class="notice inline notice-generic">
        <h2>
            Enter a new location for this file
        </h2>
        <p>
            <input type="text" name="dest" value="<?php $file->e('relpath')?>" class="large-text" />
        </p>
    </div>
