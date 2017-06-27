 // Load the node to update
    $node = node_load($record->nid);
    
    // Set the field value 
    $node->field_news_node_reference[$node->language][0]['nid'] = $record->ref_node;
    
    // Optional lines to make this change a new revision
    $node->revision = 1;
    $node->log = 'This node was programmatically updated on ' . date('c');   
    
    // Save the updated node
    node_save($node);
  }  
