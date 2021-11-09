INSERT INTO clients 
(clientFirstName , clientLastName , clientEmail , clientPassword , comment) 
VALUES("Tony" , "Stark" , "tony@starkent.com" , "Iam1ronM@n" , "I am the real Ironman");

UPDATE clients SET clientLevel = "3"
WHERE clientFirstName = "Tony";

UPDATE inventory
SET invDescription = replace(invDescription, "small interior", "spacious interior")
WHERE invMake="GM" AND invModel="Hummer";

SELECT carclassification.classificationName
FROM carclassification
INNER JOIN inventory ON carclassification.classificationId=inventory.classificationId
WHERE carclassification.classificationName="SUV";

DELETE FROM inventory
WHERE invMake="Jeep" AND invModel="Wrangler";

UPDATE inventory
SET invImage=CONCAT('/phpmotors',invImage),invThumbnail=CONCAT('/phpmotors',invThumbnail);
