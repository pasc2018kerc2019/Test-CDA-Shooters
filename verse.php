<?php


class Verse
{
    private $songVerse;//acquire the protection of the class

    
    public function __construct($songVerse)//creation of the constructor  put the object in a valid state
    {
        $this->songVerse = $songVerse;
    }


    public function rangeInteger($playerint, $min, $max)
    {
       // let's check the variable to find an integer or not
        // and if the number is out of range by creating a condition range in an array inside a php boolean filter constant
        
        if (filter_var(
            $playerint,
            FILTER_VALIDATE_INT,
            array("options"
            => array("min_range" => $min, "max_range" => $max))
        ) === false) {
            return false;

        //error we don't play the verse
        } else {
            return true;
            //let's go on
        }
    }
    //let's create the method to control the game with multiple conditions depending on the input choice
    public function playVerse()
    {    
        if (isset($_POST['player_choice']))  //let's check if a variable is declared
        {
            $min = 0;//  creation of min range :min value integer
            $max = 99;//  creation of max range :max value integer
            $playerint = htmlspecialchars($_POST['player_choice']);// (security) convert special characters to string (html entities)
            // and rename the input name this variable to be used in the class more easily and declared for rangeInteger method


            if ($this->rangeInteger($playerint, $min, $max)) {
                //Variable value is within the legal range let's go on "true" with conditions related to the storyboard of the "gamesong"
                //first case the choice is zero
                if ($playerint == $min) {
                    echo '<p style="color:red;"> Plus de shooters sans alcool sur le mur, plus de shooters sans alcool. </br>
                            Vas au supermarché pour en acheter, 99 shooters sans alcool sur le mur.</p>';
                //second case the choice is one
                } elseif ($playerint == 1) {
                    echo '<p style="color:orange;">' . $playerint . ' shooter sans alcool sur le mur, ' . $playerint . ' shooter sans alcool. </br>
                        Bois en un et au suivant ! plus de shooters sans alcool sur le mur.</p>';
                //third choice the number is 2 and using automatic decrementation -- php for (-1)
                } elseif ($playerint == 2) {
                    echo '<p style="color:purple;" >' . $playerint . ' shooters sans alcool sur le mur, ' . $playerint . ' shooters sans alcool. </br>
                        Bois en un et au suivant ! ' . --$playerint . ' shooter sans alcool sur le mur.</p>';
                //fourth choice include multiple choices between 3 and 99 and using automatic decrementation -- php for (-1)
                } else {
                    echo '<p style="color:green;">' . $playerint . ' shooters sans alcool sur le mur, ' . $playerint . ' shooters sans alcool. </br>
                        Bois en un et au suivant ! ' . --$playerint . ' shooters sans alcool sur le mur.</p>';
                }
            } else {
                //stop the execution Variable value is not within the legal range
                echo '<p style="color:red;"> Votre choix ' . $playerint . ' n\'est pas un nombre entier compris entre 0 et 99 <br />Veuillez recommencer!</p>';
            }      
          // let's check if the choice is empty     
        } elseif (empty($playerint)) {
            echo '<p> Veuillez indiquer un nombre compris entre 0 et 99 pour jouer</p>';
        }
        
    }
}
