-- Migration script to add face_encoding, time_in, and time_out columns to personnels table
ALTER TABLE personnels ADD COLUMN face_encoding TEXT NULL;
ALTER TABLE personnels ADD COLUMN time_in DATETIME NULL;
ALTER TABLE personnels ADD COLUMN time_out DATETIME NULL;
