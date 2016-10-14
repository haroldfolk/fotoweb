<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 13-10-16
 * Time: 10:25 PM
 */
$js='{    
    "faceIds":[    
        "c5c24a82-6845-4031-9d5d-978df9175426",
        "015839fb-fbd9-4f79-ace9-7675fc2f1dd9",
        "65d083d4-9447-47d1-af30-b626144bf0fb",
        "fce92aed-d578-4d2e-8114-068f8af4492e",
        "30ea1073-cc9e-4652-b1e3-d08fb7b95315",
        "be386ab3-af91-4104-9e6d-4dae4c9fddb7",
        "fbd2a038-dbff-452c-8e79-2ee81b1aa84e",
        "b64d5e15-8257-4af2-b20a-5a750f8940e7"
    ]
}';
$js2='{
    "groups": [
    [
        "c5c24a82-6845-4031-9d5d-978df9175426",
        "015839fb-fbd9-4f79-ace9-7675fc2f1dd9",
        "fce92aed-d578-4d2e-8114-068f8af4492e",
        "b64d5e15-8257-4af2-b20a-5a750f8940e7"
    ],
    [
        "65d083d4-9447-47d1-af30-b626144bf0fb",
        "30ea1073-cc9e-4652-b1e3-d08fb7b95315"
    ]
]
}';
//
//$arrayConGrupos=json_decode($js2,true);
//if (isset($arrayConGrupos["messyGroup"])){
//    if (estaEnEsteGrupo("be386ab3-af91-4104-9e6d-4dae4c9fddb7",$arrayConGrupos["messyGroup"])){
//echo "la persona NO esta en esta foto";
//
//    }
//    else{
//        echo "la persona esta en esta foto";
//    }
//}else{
//    echo "si o si tiene que estar en esta foto";
//}
//
//function estaEnEsteGrupo($faceId, $messyGroup)
//{
//    if (in_array($faceId,$messyGroup)){
//        return true;
//    }
//    return false;
//}
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="PSP26F3RKJM34">
    <input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
