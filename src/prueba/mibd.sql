CREATE TABLE jerseys (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    team TEXT NOT NULL,
    year INTEGER NOT NULL,
    model TEXT NOT NULL
);

INSERT INTO jerseys (team, year, model) VALUES ('FC Barcelona', 2023, 'Home Jersey');
INSERT INTO jerseys (team, year, model) VALUES ('FC Barcelona', 2022, 'Away Jersey');
INSERT INTO jerseys (team, year, model) VALUES ('Real Madrid', 2023, 'Third Jersey');
INSERT INTO jerseys (team, year, model) VALUES ('Real Madrid', 2021, 'Home Jersey');
INSERT INTO jerseys (team, year, model) VALUES ('Manchester United', 2023, 'Home Jersey');
INSERT INTO jerseys (team, year, model) VALUES ('Manchester United', 2022, 'Away Jersey');
INSERT INTO jerseys (team, year, model) VALUES ('Liverpool', 2021, 'Home Jersey');
INSERT INTO jerseys (team, year, model) VALUES ('Liverpool', 2022, 'Third Jersey');
