DROP TABLE "BLOG";

CREATE TABLE "BLOG" (
	"id"	INTEGER,
	"title"	TEXT NOT NULL,
    "description" TEXT NOT NULL,
	"creation_timestamp" BIGINT NOT NULL,
    "published" INTEGER NOT NULL DEFAULT 0,
	"full_text"	TEXT NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
