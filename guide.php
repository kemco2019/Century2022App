<?php
$select = $_POST["select"];
if(!$_POST["select"]){
	header('Location: index.html');
}
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/works.css">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/remix.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">



    <!-- script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script defer src="js/fontawesome/all.min.js"></script>
    <script src="js/changeLang.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="js/audio1.js"></script>
	<script src="js/scroll.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="js/jquery.layerBoard.js"></script>
    <script>
        $(function(){
            $('#layer_board_area').layerBoard({alpha:0});
        })
    </script>
</head>


<body>	
<!-- Common Contents -->
<div class="main">
	<div class="commonContent">
		<img src="images/kemco_logo.png" id="kemlogo">
		<div class="homeicon">
			<a href="index.html"><img src="images/home.png" id="homeicon"></a>
			HOME
		</div>
	</div>
	<div class="top_images">
		<img src="images/top2.png" class="top2">
	</div>
	<div class="select_sec">
		<?php 
			if ($select == "easy"){
				echo "<img src='images/select1.png' alt='' id='mode'>";
			} else {
				echo "<img src='images/select2.png' alt='' id='mode'>";
			}
		?>
		<a href="#chapter01Link"><img src="images/tab1.png" alt="I." id="select"></a>
		<a href="#chapter02Link"><img src="images/tab2.png" alt="II." id="select"></a>
		<a href="#chapter03Link"><img src="images/tab3.png" alt="III." id="select"></a>
		<a href="#chapter04Link"><img src="images/tab4.png" alt="III." id="select"></a>
		<a href="#chapter05Link"><img src="images/tab5.png" alt="III." id="select"></a>
	</div>
<!-- end Common Contents -->
<?php 
	for($j=1 ; $j<=5 ; $j++){
?>
<hr>
<!-- 各章 -->
<a id="chapter0<?php echo $j; ?>Link" class="anchorLink"></a>
	<!-- 章タイトル -->
	<table class="titleBox">
		<tr>
			<?php
				$file = 'csv/sec'.$j.'_'.$select.'.csv';
				$lines = file($file);
        		$line = $lines[0];
				$data = explode(',', $line);
			?>
			<td><img src="images/motokazu_back-01.png" id="motokazu"></td>
		    <td id="session_name">Section<?php echo $j; ?><br><?php echo $data[1]; ?></td>
		</tr>
	</table>
	<!-- 章タイトル終わり -->
	<!-- 章の説明 -->
	<div class="txtBox">
		<?php echo $data[4]; ?>
		<!--　音声 -->
		<div class="column align-x-right">
			<p class="lead">
		        <div class="bar">
		            <p><time id="playback_position_jp<?php echo $j+44; ?>">0:00</time><input type="range" class="input-range" id="progress_jp<?php echo $j+44; ?>" value="0" min="0" step="1"><time id="end_position_jp<?php echo $j+44; ?>">0:00</time></p>
	            </div>
		    	<!-- 音声ファイル -->
			    <audio id="audio_jp<?php echo $j+44; ?>" preload>
		            <source src=<?php echo $data[3]; ?> type="audio/mp3">
		        </audio>
	            <!-- 再生ボタン -->
		        <div class="play">
		            <button id="btn-play_jp<?php echo $j+44; ?>" type="button"><i class="fas fa-play"></i></button>
	            </div>
	        </p>
	    </div>
		<!-- 音声終わり -->
	</div>
	<!--章の説明終わり -->
	<details>
		<summary>作品一覧を見る</summary>
		<section id="about" class="s-about target-section large-3 medium-12">
			<?php
            	for($i=1; $i < count($lines); $i++){ 
        		$line = $lines[$i];
				$data = explode(',', $line);
			?>
			<!-- 作品説明 -->
			<div class="section-head">
				<!-- 作品タイトル -->
			    <table id="midashi" class="section<?php echo $j; ?>">
			        <tr>
			            <td class="no1 left">  </td>
			            <td class="midashiname no1 right"><?php echo $data[0]; ?></td>
			        </tr>
		            <tr>
						<td class="no2 left">  </td>
	                    <td class="midashiname no2 right"><?php echo $data[1]; ?></td>			                </tr>
				</table>
				<!-- 作品詳細 -->
				<div class="slider-x">
					<?php echo $data[2]; ?>
					
				</div>
				<!--　音声 -->
			    <div class="column align-x-right">
			        <p class="lead">
		            <div class="bar">
		                <p><time id="playback_position_jp<?php echo $data[0]; ?>">0:00</time><input type="range" class="input-range" id="progress_jp<?php echo $data[0]; ?>" value="0" min="0" step="1"><time id="end_position_jp<?php echo $data[0]; ?>">0:00</time></p>
	                </div>
		        	<!-- 音声ファイル -->
			        <audio id="audio_jp<?php echo $data[0]; ?>" preload>
		                <source src=<?php echo $data[3]; ?> type="audio/mp3">
		            </audio>
		            <!-- 再生ボタン -->
		            <div class="play">
		                <button id="btn-play_jp<?php echo $data[0]; ?>" type="button"><i class="fas fa-play"></i></button>
		            </div>
			        </p>
		         </div>
				<!-- 音声終わり -->
				<details>
				<summary>作品解説を読む</summary>
					<div class="work_txt">
						<?php echo $data[4]; ?>
					</div>
                </details>
			</div> 
			<!-- 作品説明終わり -->
			<?php } ?>
		</section>
	</details>
	<!-- 各章終わり -->
		        
<?php } ?>
<footer>
    <hr>
    <div class="box">
    <p style="font-size:40px;"><a href="https://twitter.com/museum_commons"><i class="ri-twitter-line"></i></a></p>
    <p style="font-size:40px;"><a href="https://instagram.com/museum.commons?utm_medium=copy_link"><i class="ri-instagram-line"></i></a></p>
    <p style="font-size:40px;"><a href="https://www.facebook.com/museum.commons/"><i class="ri-facebook-box-line"></i></a></p>
    </div>
    <hr>
    <p class="text-center"> 慶應ミュージアム・コモンズ<br> © 2022-2023 Keio University
    
</footer>
</div>   

<!-- Java Script -->
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>

</body>
</html>