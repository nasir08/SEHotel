<?php
/**
 * Created By: Darmie Blinks
 * Date: 8/9/12
 * Time: 10:17 PM
 * To change this template use File | Settings | File Templates.
 */

class modalBox
{
    public static function createModalBox($title, $content, $type = 'form:login', $extra = '')
    {
        // the type can either be alert or form
        echo '<div class="modalbox" id="dialogbox">
        <div class="modal_content">
            <div class="modal_head">
                <h2>' . $title . '</h2>
                <span onclick="closeDialog()">X</span>
            </div>

            <div class="modal_body">';
        $realType = explode(':', $type, 2);
        if($realType[0] == 'form')
        {
            echo '<form action="?formmode=1" method="post">'
                . $content .
            '<br /><input type="submit" name="' . $realType[1] . '" value="' . $realType[1] . '" />
            </form>';
        }
        else
        {
            echo $content;
        }

        echo $extra;
            echo '</div>
        </div>
    </div>';
    }

}
?>
