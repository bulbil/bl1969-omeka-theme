<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>

    <!-- Based on item type and format, decides what viewer/player to display first -->
    <?php

        $type = metadata($item, 'item_type_name');
        if( $type == 'Still Image' ||
            ($type  == 'Text' && 
            stripos(metadata($item, array('Dublin Core', 'Format')), 'jpg') !== false)) {
            echo files_for_item(array(
                'linkAttributes' => array('target' => '_blank'),
                'imgAttributes' => array('id' => 'image-preview'),
                'imageSize' => 'fullsize'
            ),$item);
        } elseif ($type == 'Moving Image') {
            echo metadata($item, array('Item Type Metadata', 'Player'));
        } elseif($type == 'Oral History' && 
            metadata($item, array('Dublin Core','Source')) ) {
            echo metadata($item, array('Dublin Core','Source'));
        } elseif($type == 'Oral History' && 
            stripos(metadata($item, array('Dublin Core', 'Format')), 'mp3') !== false) {
            $itemFiles =  files_for_item(array(
                'linkAttributes' => array('target' => '_blank'),
                'imgAttributes' => array('id' => 'image-preview'),
                'imageSize' => 'thumbnail'
            ),$item);
            $filesArray = explode("</div>", $itemFiles);
            echo "<div class='audio-interview'>";
            echo $filesArray[0] . "</div>";
            echo $filesArray[1] . "</div></div>";
        }?>

   <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

  <!-- Items metadata -->
  <div id="item-metadata">
    <?php echo all_element_texts('item'); ?>
</div>

<?php if(metadata('item','Collection Name')): ?>
  <div id="collection" class="element">
    <h3><?php echo __('Collection'); ?></h3>
    <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
</div>
<?php endif; ?>

<!-- The following prints a list of all tags associated with the item -->
<?php if (metadata('item','has tags')): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
<?php endif;?>

<!-- The following prints a citation for this item. -->
<div id="item-citation" class="element">
    <h3><?php echo __('Citation'); ?></h3>
    <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
</div>


<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>

</div> <!-- End of Primary. -->

<?php echo foot(); ?>
