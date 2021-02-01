<?php

    class qa_random_questions {

        function allow_template($template)
        {

            $allow=true;
            
            return $allow;
        }

        function allow_region($region)
        {
            return ($region=='side');
        }

        function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
        {
			$widget_title = qa_opt('random_widget_title');
			$max_show_num = qa_opt('random_question_number');
			
			$get_rand_sql = '^posts.postid > (SELECT floor( RAND() * ((SELECT MAX(^posts.postid) FROM ^posts)-(SELECT MIN(^posts.postid) FROM ^posts)) + (SELECT MIN(^posts.postid) FROM ^posts)))';
			$random_sql = 'SELECT title, postid FROM ^posts WHERE type=$ and ' . $get_rand_sql.' limit '.$max_show_num;
            $queryed_questions = qa_db_query_sub($random_sql,'Q');
         
            $themeobject->output('<h2>'.$widget_title.'</h2>');
			$index = 1;
            foreach($queryed_questions as $questions){
				$question_url=qa_path_html(qa_q_request($questions['postid'], $questions['title']));
				$title_sub='['.strval($index).']'.$questions['title'];
				$themeobject->output('<div style="padding-bottom:4px;font-size: 14px;"><a href="'.$question_url.'">'.$title_sub.'</a></div>');
			    $index++;
			}
        }
    };

