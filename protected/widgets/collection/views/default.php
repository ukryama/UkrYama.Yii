<!-- <p class="collection">
	Наша коллекция насчитывает<br /><strong><a href="/map/"><?php echo $all; ?></a> / <a href="/map/?STATE[2]=inprogress"><?php echo $ingibdd; ?>&nbsp; в гибдд</a> / <a href="/map/?STATE[3]=fixed"><?php echo $fixed; ?>&nbsp;исправлено</a></strong>
</p> -->

<div class="collection">
	<span class="label">Наша колекція нараховує:</span>
	<div class="collection-counter-wrap">
		<div class="collection-item">
			<div class="wrap">
				<span class="inside">
					<?php 
						for($i = 0; $i < 3 	; $i++)
						{
						    echo '<span>'. $all[$i].'</span>';
						}
					?>
				</span>
			</div>
			дефекти
		</div>
		<div class="collection-item">
			<div class="wrap">
				<span class="inside">
					<?php 
						for($i = 0; $i < strlen($ingibdd); $i++)
						{
						    echo '<span>'. $ingibdd[$i].'</span>';
						}
					?>
				</span>
			</div>
			в ДАЇ
		</div>
		<div class="collection-item">
			<div class="wrap">
				<span class="inside">
					<?php 
						for($i = 0; $i < strlen($fixed) 	; $i++)
						{
						    echo '<span>'. $fixed[$i].'</span>';
						}
					?>
				</span>
			</div>
			виправлено
		</div>
		<div class="collection-item how">
			<a href="#">Як покращити<br> ці показники?</a>
		</div>
	</div>
</div>	