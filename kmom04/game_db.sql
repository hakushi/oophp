    CREATE TABLE Game
    (
      id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
      title VARCHAR(100) NOT NULL,
      console VARCHAR(100),
      publisher VARCHAR(100),
      genre VARCHAR(20),
      year INT NOT NULL DEFAULT 1900,
      image VARCHAR(300)
    ) ENGINE INNODB CHARACTER SET utf8;

  INSERT INTO Game (title, console, publisher, genre, year, image) VALUES
 ('Mega Man', 'NES', 'Capcom', 'Platform', 1987, 'http://upload.wikimedia.org/wikipedia/en/a/a7/Megaman_nes_pal.jpg'),
 ('Fallout 3', 'XBOX360', 'Bethesda', 'FPS', 2008, 'http://www.uvm.edu/~mbeal/cs008/finalProject/fallout3.jpg'),
 ('Final Fantasy VII', 'Playstation', 'Squaresoft', 'RPG', 1997, 'http://upload.wikimedia.org/wikipedia/en/c/c2/Final_Fantasy_VII_Box_Art.jpg'),
 ('Chrono Trigger', 'SNES', 'Squaresoft', 'RPG', 1995, 'http://grajpopolsku.pl/images/gry/snes/chronotrigger/okladka.jpg')
 ;