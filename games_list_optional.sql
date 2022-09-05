#Here are some games to start, this is optional
#This will ignore duplicates that it will still enter the rest of the new records.

INSERT IGNORE INTO game_list (id, publisher, name, nickname, rating, created_date, updated_date) VALUES 
(NULL, 'Ubisoft', 'Far Cry 4', 'farcry4', '5', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), 
(NULL, 'Nintendo', 'Super Mario World', 'Mario World', '5', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(NULL, 'Nintendo', 'Super Mario World', 'Mario World', '5', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(NULL, 'CD Projekt Red', 'Cyber Punk 2077', 'Cyber Punk', '5', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(NULL, 'Atari 2600', 'E.T. the Extra-Terrestrial', 'ET', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(NULL, 'Hello Games', 'No Man\'s Sky', 'No Man\'s Sky', '5', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);