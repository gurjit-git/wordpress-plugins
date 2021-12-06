<?php
function jbm_instagram_gallery($atts){
	
	$atts = shortcode_atts( array(
		'accesstoken' => '',
		'container-class' => '',
		'count' => 50,
		'cols' => 4,
	), $atts);
	
	$html = '';
	$numOfCols = 4;
    //$rowCount = 0;
    //$bootstrapColWidth = 12 / $numOfCols;
    
    $col_width = 100 / $atts['cols'];
    
    $igs_frontend = array(
        'display_type' => 'gallery',
        'popup' => true
    );
    
	$HJMBGIinstagram = new HJMBGInstagram(array(
		
		'accessToken' => $atts['accesstoken'],
		'feedCount'  => $atts['count']
		
	));
	
	//$user_url = $HJMBGIinstagram->getUserUrl();
	
	//$returnUser_feeds = $HJMBGIinstagram->instagram_api_curl_connect($user_url);

    $returnUser_feeds = $HJMBGIinstagram->instagramFeeds();

	if($returnUser_feeds->meta->code == 400){
		$html .= "<div class='container'>";
		$html .= $returnUser_feeds->meta->error_message;
		$html .= "</div>";
	}
	else{
		if(is_array($returnUser_feeds->data)){
			$html .= '<div class="instagallery-items instagallery" id="instagal-1" data-igfs="' .htmlentities(json_encode($igs_frontend)).'">';
			foreach ($returnUser_feeds->data as $post) {
				 
				/*echo "<pre>";
				print_r($post);
				echo "</pre>";*/
				 
				$html .= '<div class="ig-item ighover cols-6" style="width:'.$col_width.'%">
					<figure>
					<a  href="' . $post->images->standard_resolution->url . '" data-fancybox="images"> 
					<img src="' . $post->images->thumbnail->url . '" alt="'.$post->type.'" class="instagallery-image" />
					
					<figcaption>
    					<div class="instagram_link" instagram_link="'.$post->link.'">
    				    	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
    					        <path style="" d="M 5 3 C 3.898438 3 3 3.898438 3 5 L 3 19 C 3 20.101563 3.898438 21 5 21 L 19 21 C 20.101563 21 21 20.101563 21 19 L 21 13 L 19 11 L 19 19 L 5 19 L 5 5 L 13 5 L 11 3 Z M 14 3 L 16.65625 5.65625 L 9.15625 13.15625 L 10.84375 14.84375 L 18.34375 7.34375 L 21 10 L 21 3 Z "></path>Link
    					    </svg>
    					</div>
					</figcaption>';
					
					if ($post->likes->count || $post->comments->count) {
                        $html .= '<span class="ig-likes-comments">';
                        if ($post->likes->count) {
                            $html .= '<span><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M377.594 32c-53.815 0-100.129 43.777-121.582 89.5-21.469-45.722-67.789-89.5-121.608-89.5-74.191 0-134.404 60.22-134.404 134.416 0 150.923 152.25 190.497 256.011 339.709 98.077-148.288 255.989-193.603 255.989-339.709 0-74.196-60.215-134.416-134.406-134.416z" fill="#fff"></path>Likes </svg>' . $post->likes->count . '</span>';
                        }
                        if ($post->comments->count) {
                           $html .= '<span><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M256 32c-141.385 0-256 93.125-256 208s114.615 208 256 208c13.578 0 26.905-0.867 39.912-2.522 54.989 54.989 120.625 64.85 184.088 66.298v-13.458c-34.268-16.789-64-47.37-64-82.318 0-4.877 0.379-9.665 1.082-14.348 57.898-38.132 94.918-96.377 94.918-161.652 0-114.875-114.615-208-256-208z" fill="#fff"></path>Comments </svg>' . $post->comments->count . '</span>';
                        }
                        $html .= '</span>';
                    }
                    
					
			$html .= '
			</a>
			</figure>
			</div>';
	
			}
			$html .= '</div>';
		}
	}
	return $html;
}
?>