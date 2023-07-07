<?php

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // Récupérer les données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  $dbhost = 'localhost';
$dbuser = 'your-db-user';
$dbpass = 'your-db-password';
$dbname = 'your-db-name';

// Connexion à la base de données
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  
  // Vérifier si la connexion a réussi
if (!$conn) {
    die('La connexion à la base de données a échoué : ' . mysqli_connect_error());
}
  
  // Préparer la requête SQL pour insérer les données dans la base de données
  $sql = "INSERT INTO clients (nom, prenom, email, message) VALUES ('$nom', '$prenom', '$email', '$message')";
  
  // Exécuter la requête SQL
  if ($conn->query($sql) === true) {
    echo "Les données ont été enregistrées avec succès";
  } else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
  }
  
  // Fermer la connexion à la base de données
  $conn->close();
  
}

