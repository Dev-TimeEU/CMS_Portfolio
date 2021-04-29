<?php $theme = $this->sessioncheck_model->configuration('theme');
$theme = $theme['value'];
//$config__theme_json = file_get_contents($data['domain_url'].'application/views/themes/'.$theme['value'].'/config.json');
//$data['config__theme__current'] = json_decode($config__theme_json); ?>
<div class="content-padder content-background">
            <div class="uk-section-small uk-section-default header">
                <div class="uk-container uk-container-large">
                    <h1><span class="ion-speedometer"></span> <?= $this->lang->line('themes'); ?></h1>
                </div>
            </div>
            <div class="uk-section-small">
                <div class="uk-container uk-container-large">
					<?php if(isset($_POST['change_theme'])){
				    //	$this->db->set('skill_percent', $this->input->post('edit_skill__percent'));
				    	//$this->db->where('id', $row->id);
				    	//$this->db->update('skills');
						echo '<div class="uk-width-1-1"><div class="uk-alert-success" uk-alert><a class="uk-alert-close" uk-close></a><p>'.$this->lang->line('change_theme').'</p></div></div>';
					} ?>

					<div class="uk-card uk-card-default uk-card-body">
					    <h1><?= $this->lang->line('themes'); ?></h1>
					    <table class="uk-table uk-table-divider">
  					      <thead>
  					          <tr>
  					              <th>#</th>
 					               <th><?= $this->lang->line('name'); ?></th>
                         <th></th>
                         <th></th>
 					               <th><?= $this->lang->line('actions'); ?></th>
 					           </tr>
 					       </thead>
 					       <tbody>
                   <?php $config__theme_json = file_get_contents('https://raw.githubusercontent.com/Dev-TimeEU/CMS_Portfolio/master/themes.json');
                   $themes = json_decode($config__theme_json, true);
					    	  foreach ($themes['themes'] as $row){ ?>
 					           <tr>
  					              <td><?= $row['id']; ?></td>
  					              <td><?= $row['theme']; ?></td>
  					              <td><?= $row['author']; ?>
                            <?php foreach ($row['author_contact'] as $author_contact){ ?>
                              <?= $author_contact['name']; ?>: <?= $author_contact['response']; ?>
                            <?php } ?>
                          </td>
  					              <td><?php if($row['price'] == "0"){ echo $this->lang->line('free'); }else{ echo $row['price']."€"; } ?></td>
  					              <td><?php if($theme == $row['theme']){ ?>
                            <button class="uk-button uk-button-secondary"><?= $this->lang->line('current'); ?></button>
                          <?php }elseif($theme != $row['theme']){ ?>
                            <?php $files = directory_map('./application/views/themes/', 1, TRUE);
  					        	    asort($files);
  					        	    foreach($files as $file){
  				        			    if(is_string($file)){
  					        	        if (ctype_lower($file)) {
  					        	        }else{
                                if($file == $row['theme']){
                                $file = preg_replace('/([A-Za-z0-9\/\.\_\-]*)\//', '$1', $file); ?>
                                  <button class="uk-button uk-button-success"><?= $this->lang->line('installed'); ?></button>
                                <?php }else{
                                $file = preg_replace('/([A-Za-z0-9\/\.\_\-]*)\//', '$1', $file); ?>
                                  <button class="uk-button uk-button-primary"><?= $this->lang->line('install'); ?></button>
                                <?php }
                              }
  					        	    	}
  					        	    } ?>
                          <?php }else{ ?>
                            <button class="uk-button uk-button-primary"><?= $this->lang->line('install'); ?></button>
                          <?php } ?>
								  </td>
  					          </tr>
					    	  <?php } ?>
 					       </tbody>
					    </table>
					</div>

                </div>
            </div>
        </div>
