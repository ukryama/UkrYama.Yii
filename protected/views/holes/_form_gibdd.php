					<!-- Не исключена вероятность того, что на <a href="http://www.gosuslugi.ru/ru/chorg/index.php?ssid_4=4120&stab_4=4&rid=228&tid=2" target="_blank">сайте госуслуг</a> окажется немного полезной информации. -->
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'request-form',
						'enableAjaxValidation'=>false,
						'action'=>Yii::app()->createUrl("holes/request", array("id"=>$hole->ID)),
						'htmlOptions'=>Array ('onsubmit'=>"document.getElementById('pdf_form').style.display='none';"),
					));
					$usermodel=Yii::app()->user->userModel;
					$model=new HoleRequestForm;

                    if (isset($usermodel->relProfile)) {
                        $model->from=$usermodel->relProfile->request_from ? $usermodel->relProfile->request_from : $usermodel->last_name.' '.$usermodel->name.' '.$usermodel->second_name;
                        $model->signature=$usermodel->relProfile->request_signature ? $usermodel->relProfile->request_signature : $usermodel->last_name.' '.substr($usermodel->name, 0, 2).($usermodel->name ? '.' : '').' '.substr($usermodel->second_name, 0, 2).($usermodel->second_name ? '.' : '');
                        $model->postaddress=$usermodel->relProfile->request_address ? $usermodel->relProfile->request_address : '';
                    }

                    $model->to=$gibdd ? $gibdd->post_dative.' '.$gibdd->fio_dative.' '.$gibdd->address : '';
                    $model->address=CHtml::encode($hole->ADDRESS);
					?>
						<h2><?= Yii::t('holes_view', 'HOLE_REQUEST_FORM') ?></h2>
						<table>
							<tr>
								<th><?php echo $form->labelEx($model,'to'); ?></th>
								<td>
                                    <?php echo $form->textArea($model,'to',array('rows'=>3, 'cols'=>40)); ?>
                                    <span class="comment"><?= Yii::t('holes_view', 'HOLE_REQUEST_FORM_TO_COMMENT') ?></span>
                                </td>
							</tr>
							<tr>
								<th><?php echo $form->labelEx($model,'from'); ?></th>
								<td>
                                    <?php echo $form->textArea($model,'from',array('rows'=>3, 'cols'=>40)); ?>
                                    <span class="comment"><?= Yii::t('holes_view', 'HOLE_REQUEST_FORM_FROM_COMMENT') ?></span>
                                </td>
							</tr>
							<tr>
								<th><?php echo $form->labelEx($model,'postaddress'); ?></th>
								<td>
                                    <?php echo $form->textArea($model,'postaddress',array('rows'=>3, 'cols'=>40)); ?>
                                    <span class="comment"><?= Yii::t('holes_view', 'HOLE_REQUEST_FORM_POSTADDRESS_COMMENT') ?></span>
                                </td>
							</tr>
							<tr>
								<th><?php echo $form->labelEx($model,'address'); ?></th>
								<td>
                                    <?php echo $form->textArea($model,'address',array('rows'=>3, 'cols'=>40)); ?>
                                    <span class="comment"><?= Yii::t('holes_view', 'HOLE_REQUEST_FORM_ADDRESS_COMMENT') ?></span>
                                </td>
							</tr>
							<? if($hole->type->alias == 'light'): ?>
								<tr>
									<th><?php echo $form->labelEx($model,'comment'); ?></th>
									<td>
                                        <?php echo $form->textArea($model,'comment',array('rows'=>3, 'cols'=>40)); ?>
                                        <span class="comment"><?= Yii::t('holes_view', 'HOLE_REQUEST_FORM_COMMENT_COMMENT') ?></span>
                                    </td>
								</tr>
							<? endif; ?>
							<tr>
								<th><?php echo $form->labelEx($model,'signature'); ?></th>
								<td>
                                    <?php echo $form->textField($model,'signature',array('class'=>'textInput')); ?>
                                    <span class="comment"><?= Yii::t('holes_view', 'HOLE_REQUEST_FORM_SIGNATURE_COMMENT') ?></span>
                                </td>
							</tr>
							<tr>
								<td colspan="2" class="action-cell">
									<?php echo CHtml::submitButton(Yii::t('holes_view', 'HOLE_REQUEST_FORM_SUBMIT'), Array('class'=>'submit', 'name'=>'HoleRequestForm[pdf]')); ?>
									<?php echo CHtml::submitButton(Yii::t('holes_view', 'HOLE_REQUEST_FORM_SUBMIT2'), Array('class'=>'submit', 'name'=>'HoleRequestForm[html]')); ?>
								</td>
							</tr>
						</table>
					<?php $this->endWidget(); ?>
					<div class="notes"><?= Yii::t('holes_view', 'ST1234_INSTRUCTION') ?></div>