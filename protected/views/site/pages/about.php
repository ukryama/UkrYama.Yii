<?
$this->pageTitle = Yii::app()->name . ' :: О проекте';
$this->layout='//layouts/header_blank';
?>
<h1><?php echo Yii::t("template", "MENU_TOP_ABOUT");?></h1>
<p class="intro"> <?php echo Yii::t("static", "STATIC_ABOUT_P_1");?> «<a
    href="/regulations/"><?php echo Yii::t("static", "STATIC_ABOUT_P_1_2");?> </a>».</p>
<div style="margin-left:40px"><p><?php echo Yii::t("static", "STATIC_ABOUT_P_2");?> <a
    href="http://zakon.rada.gov.ua/cgi-bin/laws/main.cgi?nreg=254%EA%2F96-%E2%F0"
    target="_blank"><?php echo Yii::t("static", "STATIC_ABOUT_P_2_1");?></a>
    <?php echo Yii::t("static", "STATIC_ABOUT_P_2_2");?>
    <a href="http://zakon.rada.gov.ua/cgi-bin/laws/main.cgi?nreg=393%2F96-%E2%F0"
       target="_blank"><?php echo Yii::t("static", "STATIC_ABOUT_P_2_3");?></a>»,
     <?php echo Yii::t("static", "STATIC_ABOUT_P_2_4");?>
</p>

    <p><?php echo Yii::t("static", "STATIC_ABOUT_P_3_1");?> «
        <a href="http://zakon.rada.gov.ua/cgi-bin/laws/main.cgi?nreg=1789-12" target="_blank">
            <?php echo Yii::t("static", "STATIC_ABOUT_P_3_2");?></a>»,
        <?php echo Yii::t("static", "STATIC_ABOUT_P_3_3");?></p>

    <p><?php echo Yii::t("static", "STATIC_ABOUT_P_4_1");?>
        <a href="/about/#pr"><?php echo Yii::t("static", "STATIC_ABOUT_P_4_2");?></a>.</p></div>
<img src="/images/pages/about.jpg" width="978" height="441" alt=""/>
<h2><?php echo Yii::t("static", "STATIC_ABOUT_H_2_1");?></h2>
<ol>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_1_1");?>
        «<a href="/regulations/"><?php echo Yii::t("static", "STATIC_ABOUT_LI_1_2");?></a>».
        <span class="comment"><?php echo Yii::t("static", "STATIC_ABOUT_LI_1_3");?></span>
    </li>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_2_1");?> «<a href="/personal/add.php"><?php echo Yii::t("static", "STATIC_ABOUT_LI_2_2");?></a>»,
        <?php echo Yii::t("static", "STATIC_ABOUT_LI_2_3");?>
    </li>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_3_1");?>.
    </li>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_4_1");?>.
        <span class="comment"><?php echo Yii::t("static", "STATIC_ABOUT_LI_4_2");?></span>
    </li>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_5_1");?></li>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_6_1");?>
        <br/>
        <br/>
        <span title="PROFIT!"><?php echo Yii::t("static", "STATIC_ABOUT_LI_6_2");?></span></li>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_7_1");?> </li>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_8_1");?></li>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_9_1");?></li>
    <li><?php echo Yii::t("static", "STATIC_ABOUT_LI_10_1");?> <a href="mailto:info@ukryama.com">info@ukryama.com</a>,
        <?php echo Yii::t("static", "STATIC_ABOUT_LI_10_2");?>

    </li>
</ol>
