<style>
    #base-logo{
        position: relative;
        bottom: 0px;
        right: 0px;
        width: 100%;
        text-align: right;
    }
    
    #base-container{
        background-color: #4975cc;
        color: #FFF;
    }
    #base-msg{
        padding: 10px;
    }
    /*VALIDATION ERROR*/
    #base-container .error{
        margin: auto;
        width:90%;
        position:relative;
        padding:10px;
        background-color: red 
    }
</style>
<div id="base-container">
    <div id="base-msg">
        <?php echo $msg ?>
        <?php echo $this->ocular->yield(); ?>
    </div>
    <div id="base-logo">
        
    </div>
</div>
