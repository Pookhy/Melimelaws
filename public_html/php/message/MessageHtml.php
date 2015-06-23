<?php

namespace Message;

class MessageHtml{
    public static function displayMessage($message){
        $html = '';
        $html .= <<<EOT
            <div class= "message">
               {$message->getContenu()}
            </div>
EOT;
        return $html;
    }
    
    public static function displayMessages($messages)   { 
        $html = '';
        foreach($messages as $message){
            $html .= self::displayMessage($message);
        }
        return $html;
    }
    
    //ADMIN
    
    public static function displayAdminMessages($messages) {
        $html = "<div id='contenu'>";
        $html .= <<<EOT
        <table>
            <caption>Table Message</caption>
            <tr>
                <th>id Message</th>
                <th>Date</th>
                <th>Message</th>
                <th>Autheur</th>
            </tr>     
EOT;
        foreach ($messages as $message) {
            $html .= <<<EOT
            <tr>
                <td>{$message->getId()}</td>
                <td>{$message->getDate()}</td>
                <td>{$message->getContenu()}</td>
                <td>{$message->getIdPersonne()}</td>
                <td>
                    <a href="index.php?t=message&action=formUpdateMessage&id={$message->getId()}" alt="Modifier">
                        Modifier
                    </a>
                </td>
                <td>
                    <a href="index.php?t=message&action=deleteMessage&id={$message->getId()}" alt="Supprimer" onclick="return(confirm('Supprimer ce message ?'))">
                        Supprimer
                    </a>
                </td>
            </tr>    
EOT;
        }
        
        $html .= "</table>";
        $html .= "<br/>";
        $html .= "<a href='index.php?t=Message&action=formInsertMessage' alt='Ajouter Message'>Ajouter</a>";
        $html .= "</div>";
        return $html;
    }

    public static function displayInsertMessage() {

        $html = "<div id='contenu'>";
        $html .= <<<EOT
            <div class="insert">
                <form action ="./index.php?t=message&action=insertMessage" method="post">
                    <fieldset>
                        <legend> Message </legend>
                            <label for"date">Date :</label> 
                            <input id="date" type="date" name="date_Message">
                            <br/>
                            <label for"message">Message :</label>
                            <input id="message" type="text" name="contenu_Message">
                            <br/>
                            <label for"idPersonne">Autheur :</label> 
                            <input id="idPersonne" type="text" name="id_Personne">
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
    
    public static function displayFormUpdateMessage($message) {
        $html = "<div id='contenu'>";
        $html .= <<<EOT
            <div class="Modification">
                <form action ="./index.php?t=message&action=updateMessage" method="post">
                    <fieldset>
                        <legend> Message </legend> 
                            <input id="id" type="hidden" name="id_Message" value="{$message->getId()}">
                
                            <label for"date">Numéro :</label> 
                            <input id="date" type="date" name="date_Message" value="{$message->getDate()}">
                            <br/>
                            <label for"message">Message :</label>
                            <input id="message" type="text" name="contenu_Message" value="{$message->getContenu()}">
                            <br/>
                            <label for"idPersonne">Autheur :</label> 
                            <input id="idPersonne" type="text" name="id_Personne" value="{$message->getIdPersonne()}">
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