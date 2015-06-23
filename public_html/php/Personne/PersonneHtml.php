<?php

namespace Personne;

class PersonneHtml {

    public static function displayPersonne($personne) {
        $html = <<<EOT
            <div class="personne">
               <img alt="" src="{$personne->getPhoto()}"/>
               
                <div class="infoPersonne>
                    <span class="nomPrenomPersonne">{$personne->getNom()} {$personne->getPrenom()}</span>
                    <br/> 
                    <span class="bio">{$personne->getBio()}</span>
                </div>
            </div>
EOT;
        return $html;
    }

    public static function displayPersonnes($personnes) {
        $html = '<div id="contenu">';
        foreach ($personnes as $personne) {
            $html .= self::displayPersonne($personne);
        }
        $html .='</div>';
        return $html;
    }
    
    public static function displayEquipes($personnes) {
        $html = '<div id="contenu">';
        foreach ($personnes as $personne) {
            $html .= self::displayPersonne($personne);
        }
        $html .='</div>';
        return $html;
    }

    public static function displayChoixTypePersonne() {
        $html = '<div id="contenu">';
        $html .= <<<EOT
            <div class="personne">
               
                <a href="index.php?t=Personne&action=allEquipe" >
                    <img alt="" src="http://www.vaceva.com/v2/img/rubriques/equipe.jpg"/>
                    Qui sommes nous ?
                </a>
                
                
                <a href="index.php?t=Personne&action=allGuest" >
                    <img alt="" src="http://www.searchmarketingstandard.com/wp-content/uploads/2013/04/WelcomeGuestsshutterstock_10730578.jpg"/>
                    Qui sont-ils ?
                </a>

            </div>
EOT;
        $html .='</div>';
        return $html;
    }

    
    //ADMIN
    
    public static function displayAdminPersonnes($personnes) {
        $html = "<div id='contenu'>";
        $html .= <<<EOT
        <table>
            <caption>Table Personne</caption>
            <tr>
                <th>id Personne</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Biographie</th>
                <th>photo</th>
                <th>Type</th>
                <th>login</th>
                <th>password</th>
            </tr>     
EOT;
        foreach ($personnes as $personne) {
            $html .= <<<EOT
            <tr>
                <td>{$personne->getId()}</td>
                <td>{$personne->getNom()}</td>
                <td>{$personne->getPrenom()}</td>
                <td>{$personne->getBio()}</td>
                <td>{$personne->getPhoto()}</td>
                <td>{$personne->getType()}</td>
                <td>{$personne->getIdConnexion()}</td>
                <td>{$personne->getMdpConnexion()}</td>
                <td>
                    <a href="index.php?t=Personne&action=formUpdatePersonne&id={$personne->getId()}" alt="Modifier">
                        Modifier
                    </a>
                </td>
                <td>
                    <a href="index.php?t=Personne&action=deletePersonne&id={$personne->getId()}" alt="Supprimer" onclick="return(confirm('Supprimer cette personne'))">
                        Supprimer
                    </a>
                </td>
            </tr>    
EOT;
        }
        $html .= "</table>";
        $html .= "<br/>";
        $html .= "<a href='index.php?t=Personne&action=formInsertPersonne' alt='Ajouter Personne'>Ajouter</a>";
        $html .= "</div>";
        return $html;
    }

    public static function displayInsertPersonne() {

        $html = "<div id='contenu'>";
        $html .= <<<EOT
            <div class="insert">
                <form action ="./index.php?t=personne&action=insertPersonne" method="post">
                    <fieldset>
                        <legend> Personne </legend>
                            <label for"nom">Nom :</label> 
                            <input id="nom" type="text" name="nom_Personne">
                            <br/>
                            <label for"prenom">Prénom :</label>
                            <input id="prenom" type="text" name="prenom_Personne">
                            <br/>
                            <label for"bio">Bio :</label> 
                            <input id="bio" type="text" name="bio_Personne">
                            <br/>
                            <label for"photo">Photo :</label> 
                            <input id="photo" type="text" name="photo_Personne">
                            <br/>
                            <label for"type">Type :</label> 
                            <select id="type" type="text" name="type_Personne">
                                <option value="melimelaws">melimelaws</otpion>
                                <option value="guest">guest</otpion>
                            </select>
                            <br/>
                            <label for"login">Login :</label> 
                            <input id="login" type="text" name="id_Connexion">
                            <br/>
                            <label for"password">Password :</label> 
                            <input id="password" type="text" name="mdp_Connexion">
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
    
    public static function displayFormUpdatePersonne($personne) {
 
        $html = "<div id='contenu'>";
        $html .= <<<EOT
            <div class="Modification">
                <form action ="./index.php?t=personne&action=updatePersonne" method="post">
                    <fieldset>
                        <legend> Personne à modifier </legend> 
                            <input id="id" type="hidden" name="id_Personne" value="{$personne->getId()}">
                
                            <label for"nom">Nom :</label> 
                            <input id="nom" type="text" name="nom_Personne" value="{$personne->getNom()}">
                            <br/>
                            <label for"prenom">Prénom :</label>
                            <input id="prenom" type="text" name="prenom_Personne" value="{$personne->getPrenom()}">
                            <br/>
                            <label for"bio">Bio :</label> 
                            <input id="bio" type="text" name="bio_Personne" value="{$personne->getBio()}">
                            <br/>
                            <label for"photo">Photo :</label> 
                            <input id="photo" type="text" name="photo_Personne" value="{$personne->getPhoto()}">
                            <br/>
                            <label for"type">Type :</label> 
                            <select id="type" type="text" name="type_Personne">
                                <option value ="{$personne->getType()}" selected >
                                    {$personne->getType()}
                                </option>
EOT;
                                if($personne->getType() == 'melimelaws'){
                                    $html .="<option value='guest'>guest</option>";
                                }else{
                                    $html .="<option value='melimelaws'>melimelaws</option>";
                                }
                                
                            $html .= <<<EOT
                            </select>
                            <br/>
                            <label for"idConnexion">Login :</label> 
                            <input id="idConnexion" type="text" name="id_Connexion" value="{$personne->getIdConnexion()}">
                            <br/>
                            <label for"mdpConnexion">Password :</label> 
                            <input id="mdpConnexion" type="text" name="mdp_Connexion" value="{$personne->getMdpConnexion()}">
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
