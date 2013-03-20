<?php $this->beginContent('//layouts/main'); ?>
<div id="addmess" style="display:none; color:#0C0"><p><b>Выберите место на карте и кликните по нему два раза, чтобы отметить расположение ямы.</b></p></div>
  <div class="head">
		<div class="container">
<div class="lCol"><a href="/" class="logo" title="На главную"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"  alt="РосЯма" /></a>
</div>
						<div class="rCol">
							<div id="head_user_info"> 
								<div class="counter">
									<span class="counter-text"><?php Yii::t('holes', 'all_defects'); ?></span><span class="count-class"><?php echo Y::declOfNum($this->user->usermodel->holes_cnt, array('', '', '')); ?></span>
									<span class="counter-text"><?php Yii::t('holes', 'fix_defects'); ?></span><span class="count-class"><?php echo Y::declOfNum($this->user->usermodel->holes_fixed_cnt, array('', '', '')); ?></span>
								</div>
								
	<div class="photo">
		<?php if($this->user->userModel->relProfile && $this->user->userModel->relProfile->avatar) echo CHtml::image($this->user->userModel->relProfile->avatar_folder.'/'.$this->user->userModel->relProfile->avatar); ?>
	</div>
	<div class="info">		 
		<h1><?php echo $this->user->fullName; ?></h1>
		<div class="www">
			<a target="_blank" href="http://"></a>
		</div>
	</div>
	<div class="buttons usermenu-container">
			<?php $this->widget('zii.widgets.CMenu', array(
				'items'=>Array(
						array('label'=>'Добавить дефект', 'url'=>array('/holes/add'), 'linkOptions'=>array('class'=>'profileBtn')),
						array('label'=>'Мои ямы', 'url'=>array('/holes/personal'), 'linkOptions'=>array('class'=>'profileBtn')),
						array('label'=>'Мой участок', 'url'=>array('/holes/myarea'), 'linkOptions'=>array('class'=>'profileBtn')),
						array('label'=>'Изменить личные данные', 'url'=>array('/profile/update'), 'linkOptions'=>array('class'=>'profileBtn')),
					),
				'htmlOptions'=>array('class'=>'usermenu'),
			));?>
        <div class="submenu-element">
        <?php if ($this->menu):?>
                <?php $this->beginWidget('zii.widgets.CPortlet', array(
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items'=>$this->menu,
                    'htmlOptions'=>array('class'=>'operations'),
                ));
                $this->endWidget();
                ?>
        <?php endif;?>
        </div>
    </div>
    </div>
    </div>
    <?php if ($this->user->isAdmin):?>
        <br/>
        <div class="buttons admin">
            <?php
            $this->widget('zii.widgets.CMenu', array(
                'items'=>Array(
                    array('label'=>'Новости', 'url'=>array('/news/admin'), 'linkOptions'=>array('class'=>'profileBtn')),
                    array('label'=>'Пользователи', 'url'=>array('/userGroups/'), 'linkOptions'=>array('class'=>'profileBtn')),
                    array('label'=>'Ямы', 'url'=>array('/holes/admin'), 'linkOptions'=>array('class'=>'profileBtn'), 'visible'=>$this->user->groupName=='root'),
                    array('label'=>'Типы ям', 'url'=>array('/holeTypes/index'), 'linkOptions'=>array('class'=>'profileBtn')),
                    array('label'=>'Результаты запроса в ГИБДД (анкета)', 'url'=>array('/holeAnswerResults/index'), 'linkOptions'=>array('class'=>'profileBtn')),
                ),
                'htmlOptions'=>array('class'=>'operations'),
            ));
            ?>
        </div>
    <?php endif;?>
    </div>
    </div>

	<div class="mainCols">
	<?php echo $content; ?>
	</div>		
	
<?php $this->endContent(); ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        var regex = /profile\/myarea/;
        if (regex.exec(window.location.href)) {
            if (jQuery('.buttons.usermenu-container li a[href="/holes/myarea/"]')) {
                jQuery('.buttons.usermenu-container li a[href="/holes/myarea/"]').parent().addClass('active');
            }
        }
    });
</script>