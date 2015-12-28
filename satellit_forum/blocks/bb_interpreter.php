<?

define('IRB_BB_PATH', 'http://'.$_SERVER['HTTP_HOST']);

$configBBcode = array(
					'max_len' => 80,
					'links' => true,
					'images' => true,
					'video' => true,

				'setup_bb' => array(
									'[b]' => '[/b]',
									'[i]' => '[/i]', 
									'[s]' => '[/s]', 
									'[u]' => '[/u]',
									'[sub]' => '[/sub]',
									'[sup]' => '[/sup]', 
									'[justify]' => '[/justify]', 
									'[left]' => '[/left]',
									'[right]' => '[/right]',
									'[center]' => '[/center]', 
									'[quote]' => '[/quote]', 
									'[list=ol]' => '[/list=ol]',
									'[list=ul]' => '[/list=ul]',
									'[*]' => '[/*]', 
									'[size=1]' => '[/size=1]', 
									'[size=2]' => '[/size=2]',
									'[size=3]'           =>   '[/size=3]', 
                                       '[size=4]'           =>   '[/size=4]', 
                                       '[size=5]'           =>   '[/size=5]', 
                                       '[h=5]'              =>   '[/h=5]',
                                       '[h=4]'              =>   '[/h=4]', 
                                       '[h=3]'              =>   '[/h=3]', 
                                       '[h=2]'              =>   '[/h=2]', 
                                       '[h=1]'              =>   '[/h=1]',
                                       '[color=gray]'       =>   '[/color=gray]',
                                       '[color=green]'      =>   '[/color=green]',
                                       '[color=purple]'     =>   '[/color=purple]',
                                       '[color=olive]'      =>   '[/color=olive]',
                                       '[color=silver]'     =>   '[/color=silver]',
                                       '[color=aqua]'       =>   '[/color=aqua]',
                                       '[color=yellow]'     =>   '[/color=yellow]',
                                       '[color=blue]'       =>   '[/color=blue]',
                                       '[color=orange]'     =>   '[/color=orange]',
                                       '[color=red]'        =>   '[/color=red]'
									),
				
				'setup_html' => array(
									'<b>' => '</b>', 
									'<i>' => '</i>', 
									'<s>' => '</s>', 
									'<u>' => '</u>',
									'<sub>'                                    =>   '</sub>', 
                                  '<sup>'                                    =>   '</sup>', 
                                  '<p align="justify">'                      =>   '</p>', 
                                  '<p align="left">'                         =>   '</p>', 
                                  '<p align="right">'                        =>   '</p>', 
                                  '<p align="center">'                       =>   '</p>',
                                  '<p class="quote"><b>цитата:</b><br />'    =>   '</p>',
                                  '<ol>'                                     =>   '</ol>',
                                  '<ul>'                                     =>   '</ul>', 
                                  '<li>'                                     =>   '</li>',
                                  '<span style="font-size:11px">'            =>   '</span>',
                                  '<span style="font-size:14px">'            =>   '</span>',
                                  '<span style="font-size:18px">'            =>   '</span>',
                                  '<span style="font-size:24px">'            =>   '</span>',
                                  '<span style="font-size:32px">'            =>   '</span>',
                                  '<h5>'                                     =>   '</h5>',
                                  '<h4>'                                     =>   '</h4>', 
                                  '<h3>'                                     =>   '</h3>',
                                  '<h2>'                                     =>   '</h2>',
                                  '<h1>'                                     =>   '</h1>',
                                  '<span style="color:gray">'                =>   '</span>',
                                  '<span style="color:green">'               =>   '</span>',
                                  '<span style="color:purple">'              =>   '</span>',
                                  '<span style="color:olive">'               =>   '</span>',
                                  '<span style="color:silver">'              =>   '</span>',
                                  '<span style="color:aqua">'                =>   '</span>',
                                  '<span style="color:yellow">'              =>   '</span>',
                                  '<span style="color:blue">'                =>   '</span>',
                                  '<span style="color:orange">'              =>   '</span>',
                                  '<span style="color:red">'                 =>   '</span>'

									),
				
				'single_tags' => array(
										'[(]'      =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/(.gif" />',
                                      '[angry]'  =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/angry.gif" />',
                                      '[worry]'  =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/worry.gif" />',
                                      '[break]'  =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/break.gif" />',
                                      '[cry]'    =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/cry.gif" />',
                                      '[D]'      =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/D.gif" />',
                                      '[fear]'   =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/fear.gif" />',
                                      '[think]'  =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/think.gif" />',
                                      '[ii]'     =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/ii.gif" />',
                                      '[sorrow]' =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/sorrow.gif" />',
                                      '[no]'     =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/no.gif" />',
                                      '[tongue]' =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/tongue.gif" />',
                                      '[wacko]'  =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/wacko.gif" />',
                                      '[woo]'    =>   '<img src="'. IRB_BB_PATH .'/satellit_forum/smiles/woo.gif" />',

                                   ),
									
				'formatters'  => array(
                                      '[code=php]'  =>  'php',
                                   ),
				
				'tmp_open'   => array(
                                       'ᐁ', 'ᐂ', 'ᐃ', 'ᐄ', 'ᐅ', 'ᐆ', 'ᐇ', 'ᐉ', 'ᐊ', 'ᐋ', 
                                       'ᐌ', 'ᐍ', 'ᐎ', 'ᐏ', 'ᐐ', 'ᐑ', 'ᐒ', 'ᐓ', 'ᐔ', 'ᐕ', 
                                       'ᐫ', 'ᐬ', 'ᐭ', 'ᐮ', 'ᐯ', 'ᐰ', 'ᐱ', 'ᐲ', 'ᐳ', 'ᐴ', 
                                       'ᐵ', 'ᐷ', 'ᐸ', 'ᐹ', 'ᐺ', 'ᐻ', 'ᐼ', 'ᐽ', 'ᐾ', 'ᐿ', 
                                       'ᑌ', 'ᑍ', 'ᑎ', 'ᑏ', 'ᑐ', 'ᑑ', 'ᑒ', 'ᑔ', 'ᑕ', 'ᑖ',

                                    ),                              
                           
        // Закрывающие теги                  
                'tmp_close'  => array(
                                        
                                       'ᑗ', 'ᑘ', 'ᑙ', 'ᑚ', 'ᑛ', 'ᑜ', 'ᑝ', 'ᑞ', 'ᑟ', 'ᑠ',  
                                       'ᑡ', 'ᑢ', 'ᑣ', 'ᑤ', 'ᑥ', 'ᑧ', 'ᑨ', 'ᑩ', 'ᑪ', 'ᑫ',
                                       'ᑬ', 'ᑭ', 'ᑮ', 'ᑯ', 'ᑰ', 'ᑱ', 'ᑲ', 'ᑳ', 'ᑴ', 'ᑵ', 
                                       'ᑶ', 'ᑷ', 'ᑸ', 'ᑹ', 'ᑺ', 'ᑻ', 'ᑼ', 'ᑽ', 'ᑾ', 'ᑿ', 
                                       'ᒀ', 'ᒁ', 'ᒂ', 'ᒌ', 'ᒍ', 'ᒎ', 'ᒏ', 'ᒐ', 'ᒑ', 'ᒒ',

                                    ),                            
        // Одиночные теги                                  
                'tmp_single' => array(                  
                                       'ᒓ', 'ᒔ', 'ᒕ', 'ᒖ', 'ᒗ', 'ᒘ', 'ᒙ', 'ᒚ', 'ᒛ', 'ᒜ', 
                                       'ᒝ', 'ᒞ', 'ᒟ', 'ᒠ', 'ᒣ', 'ᒤ', 'ᒥ', 'ᒦ', 'ᒧ', 'ᒨ', 
                                       'ᒩ', 'ᒪ', 'ᒫ', 'ᒬ', 'ᒭ', 'ᒮ', 'ᒯ', 'ᒰ', 'ᒱ', 'ᒲ', 
                                       'ᒳ', 'ᒴ', 'ᒵ', 'ᒶ', 'ᒷ', 'ᒸ', 'ᒹ', 'ᒺ', 'ᓀ', 'ᓁ', 
                                       'ᓂ', 'ᓃ', 'ᓄ', 'ᓅ', 'ᓆ', 'ᓇ', 'ᓈ', 'ᓉ', 'ᓊ', 'ᓋ', 
                                    ),
                   


);






?>