<!DOCTYPE html>
<html>

<body>

<?php
	/* 
	
	Pesten Simulator by Hasan Cakar
	
	*/
	
	/*Classes*/
	// Card class
	
	class Cards{
	
		//Card attributes
		public $numbers = array("Ace", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King");
		public $suits = array("Spades", "Clubs", "Hearts", "Diamonds");
		public $deck = array();

		// Card methods
		// Generate 52 cards
		function __construct() {
			foreach($this->suits as $suit) {
				foreach($this->numbers as $number) {
					$this->deck[] = array($number, $suit);
                }
			}
        }
		
		//Function to shuffle cards randomly
		public function deck_Shuffle() {
			shuffle($this->deck);
		}
		
		//Selects the first card and removes it from the deck (should be done AFTER shuffling)
		public function draw_Card() {
			array_shift($this->deck);
		}
		
	}
	
	//Player class
	class Player{
	
		//Player attributes
		public $name;
		public $hand = array();
	
		function __construct($name = null, $hand = null) {
			$this->name = $name;
			$this->hand = $hand;
		}
		
	}
	
	//Simulation
	
	//Initilisation
	$gameDeck = new Cards; //creates game deck
	//boolean variable to control running procedures (True means running, false means opposite)
	$gamePlaying = True;
	//Creating list of players and setting their attributes
	$players = array(
		(new Player("Player 1", array())),
		(new Player("Player 2", array())),
		(new Player("Player 3", array())),
		(new Player("Player 4", array()))
		);
	//Deck-related variables
	$current_Card = array();
		
	//Procedure of simulating Pesten
	echo "[",date("Y-m-d h:i:sa"),"] ","Welcome to Pesten game simulator.<br>";
	$gameDeck->deck_Shuffle(); //calling shuffle function to randomise card order
	echo "[",date("Y-m-d h:i:sa"),"] ","The deck has been shuffled by the dealer.<br>";
	$current_Card = $gameDeck->deck[0];
	$gameDeck->draw_Card();
	echo "[",date("Y-m-d h:i:sa"),"] ","The first card in the pile has been dealt, it is the ",$current_Card[0]," of ",$current_Card[1]."<br>";
	
	foreach($players as $player) {
		$players[] = $gameDeck->deck[0];
		$gameDeck->draw_Card();
	}
	echo "[",date("Y-m-d h:i:sa"),"] ","The players have now been dealt their cards.<br>";
	var_dump($gameDeck);
	var_dump($players);
	
	//if($gamePlaying == True) {
	//}
?>

</body>
</html>