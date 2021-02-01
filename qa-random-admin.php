<?php
	class qa_random_question_admin {

		function option_default($option) {
			
			switch($option) {
				case 'random_widget_title':
					return 'Random Question';
				case 'random_question_number':
					return '10';
				default:
					return null;				
			}
			
		}
		
		function allow_template($template)
		{
			return ($template!='admin');
		}	   
			
		function admin_form(&$qa_content)
		{					   
			$ok = null;
			if (qa_clicked('random_question_save')) {
				qa_opt('random_question_number',qa_post_text('random_question_number'));
				qa_opt('random_widget_title',qa_post_text('random_widget_title'));
				$ok = qa_lang_html('admin/options_saved');
			}
			
			return array(		   
				'ok' => ($ok && !isset($error)) ? $ok : null,	
				'fields' => array(
					array(
						'label' => 'Number of questions to show:',
						'tags' => 'NAME="random_question_number"',
						'value' => qa_opt('random_question_number'),
						'type' => 'number',
					),array(
						'label' => 'Widget title:',
						'tags' => 'NAME="random_widget_title"',
						'value' => qa_opt('random_widget_title'),
						'type' => 'text',
					),array(
						'type' => 'custom',
						'html' => '<button><a href="https://paypal.me/guangyuezhao" target="_blank">Donate us</a></button>',
					)
				),
				'buttons' => array(
					array(
						'label' => 'Save',
						'tags' => 'NAME="random_question_save"',
					)
				)
			);
		}
	}

