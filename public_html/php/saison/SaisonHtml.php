<?php

namespace Saison;

class SaisonHtml
{

    public static function displaySaison($saison)
    {
        $html = '';
        $html .= <<<EOT
            <div class="saison">
                <a href="index.php?t=saison&action=voirSaison&id={$saison->getId()}">
                    <span class="saisonTitle">Saison {$saison->getNum()}</span>
                    <img alt="" src="{$saison->getPhoto()}"/><br/>
                </a>
            </div>
EOT;
        return $html;
    }

    public static function displaySaisons($saisons)
    {
        $html = '<div id="contenu">';
        foreach ($saisons as $saison) {
            $html .= self::displaySaison($saison);
        }
        $html .='</div>';
        return $html;
    }

    //          ADMIN
    
    public static function displayAdminSaisons($saisons) {
        $html = "<div id='contenu'>";
        $html .= <<<EOT
        <table>
            <caption>Table Saison</caption>
            <tr>
                <th>id Saison</th>
                <th>Numéro</th>
                <th>Photo</th>
            </tr>     
EOT;
        foreach ($saisons as $saison) {
            
            $html .= <<<EOT
            <tr>
                <td>{$saison->getId()}</td>
                <td>{$saison->getNum()}</td>
                <td>{$saison->getPhoto()}</td>
                <td>
                    <a href="index.php?t=Saison&action=formUpdateSaison&id={$saison->getId()}" alt="Modifier">
                        Modifier
                    </a>
                </td>
                <td>
                    <a href="index.php?t=Saison&action=deleteSaison&id={$saison->getId()}" alt="Supprimer" onclick="return(confirm('Supprimer cette Saison ?'))">
                        Supprimer
                    </a>
                </td>
            </tr>    
EOT;
        }
        $html .= "</table>";
        $html .= "<br/>";
        $html .= "<a href='index.php?t=Saison&action=formInsertSaison' alt='Ajouter Saison'>Ajouter</a>";
        $html .= "</div>";
        return $html;
    }

    public static function displayInsertSaison() {

        $html = "<div id='contenu'>";
        $html .= <<<EOT
            <div class="insert">
                <form action ="./index.php?t=saison&action=insertSaison" method="post">
                    <fieldset>
                        <legend> Saison </legend>
                            <label for"num">Numéro :</label> 
                            <input id="num" type="text" name="num_Saison">
                            <br/>
                            <label for"photo">Adresse de la photo :</label>
                            <input id="photo" type="text" name="photo_Saison">
                            <br/>
                            <br/>
                            <input type="submit" value="valider" />                 
                    </fieldset>
                </form>
            </div>
EOT;
        $html .= "</div>";
        return $html;
    }
    
    public static function displayFormUpdateSaison($saison) {

        $html = "<div id='contenu'>";
        $html .= <<<EOT
            <div class="Modification">
                <form action ="./index.php?t=saison&action=updateSaison" method="post">
                    <fieldset>
                        <legend> Saison à modifier </legend> 
                            <input id="id" type="hidden" name="id_Saison" value="{$saison->getId()}">
                
                            <label for"num">Numéro :</label> 
                            <input id="num" type="text" name="num_Saison" value="{$saison->getNum()}">
                            <br/>
                            <label for"photo">Photo :</label>
                            <input id="photo" type="text" name="photo_Saison" value="{$saison->getPhoto()}">
                            <br/>
                            <br/>
                            <input type="submit" value="valider" />                 
                    </fieldset>
                </form>
            </div>
EOT;
        $html .= "</div>";
        return $html;
    }
}
