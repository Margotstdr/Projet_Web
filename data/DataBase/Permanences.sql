-- =============================================
-- PERMANENCES - Semaine 1 : 23 au 27 mars 2026
-- =============================================

-- Lundi 23 mars
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Algorithmique',               '08:00:00', 'A104', '2026-03-23', 1),  -- Alhammada Elias
('Base de données',             '10:00:00', 'H202', '2026-03-23', 2),  -- Badra Riham
('Réseaux',                     '14:00:00', 'H306', '2026-03-23', 3);  -- Ben Khelil Cherifa

-- Mardi 24 mars
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Programmation C',             '09:00:00', 'H208', '2026-03-24', 4),  -- Conteville Laurie
('Développement web',           '11:00:00', 'H213', '2026-03-24', 5),  -- Gabis Asma
('Systèmes d exploitation',     '15:00:00', 'A104', '2026-03-24', 6);  -- Guifo Fodjo Yvan

-- Mercredi 25 mars
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Architecture des ordinateurs', '08:00:00', 'H202', '2026-03-25', 7),  -- Hamidi Mohamed
('Algorithmique',               '10:00:00', 'H306', '2026-03-25', 8),  -- Klai Kaïs
('Base de données',             '14:00:00', 'H208', '2026-03-25', 9);  -- Kmimech Mourad

-- Jeudi 26 mars
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Réseaux',                     '09:00:00', 'H213', '2026-03-26', 10), -- Rakotonarivo Rado
('Programmation C',             '11:00:00', 'A104', '2026-03-26', 11), -- Ta Michaël
('Développement web',           '15:00:00', 'H202', '2026-03-26', 12); -- Trebaul Lena

-- Vendredi 27 mars
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Systèmes d exploitation',     '08:00:00', 'H306', '2026-03-27', 13), -- Chabchoub Kamel
('Architecture des ordinateurs', '10:00:00', 'H208', '2026-03-27', 14), -- Soglo Yaovi
('Algorithmique',               '14:00:00', 'H213', '2026-03-27', 1);  -- Alhammada Elias

-- =============================================
-- PERMANENCES - Semaine 2 : 30 mars au 3 avril 2026
-- =============================================

-- Lundi 30 mars
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Base de données',             '09:00:00', 'A104', '2026-03-30', 2),  -- Badra Riham
('Réseaux',                     '11:00:00', 'H202', '2026-03-30', 3),  -- Ben Khelil Cherifa
('Programmation C',             '15:00:00', 'H306', '2026-03-30', 4);  -- Conteville Laurie

-- Mardi 31 mars
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Développement web',           '08:00:00', 'H208', '2026-03-31', 5),  -- Gabis Asma
('Systèmes d exploitation',     '10:00:00', 'H213', '2026-03-31', 6),  -- Guifo Fodjo Yvan
('Architecture des ordinateurs', '14:00:00', 'A104', '2026-03-31', 7); -- Hamidi Mohamed

-- Mercredi 1er avril
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Algorithmique',               '09:00:00', 'H202', '2026-04-01', 8),  -- Klai Kaïs
('Base de données',             '11:00:00', 'H306', '2026-04-01', 9),  -- Kmimech Mourad
('Réseaux',                     '15:00:00', 'H208', '2026-04-01', 10); -- Rakotonarivo Rado

-- Jeudi 2 avril
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Programmation C',             '08:00:00', 'H213', '2026-04-02', 11), -- Ta Michaël
('Développement web',           '10:00:00', 'A104', '2026-04-02', 12), -- Trebaul Lena
('Systèmes d exploitation',     '14:00:00', 'H202', '2026-04-02', 13); -- Chabchoub Kamel

-- Vendredi 3 avril
INSERT INTO Permanence (matiere_perm, heure_perm, salle_perm, date_perm, id_ens_responsable) VALUES
('Architecture des ordinateurs', '09:00:00', 'H306', '2026-04-03', 14), -- Soglo Yaovi
('Algorithmique',               '11:00:00', 'H208', '2026-04-03', 1),  -- Alhammada Elias
('Base de données',             '15:00:00', 'H213', '2026-04-03', 2);  -- Badra Riham

-- On remplit Presenter en se basant sur ce qui est déjà dans Permanence
INSERT INTO Presenter (id_ens, id_perm)
SELECT id_ens_responsable, id_perm
FROM Permanence;