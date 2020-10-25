CREATE TABLE treebbs_main (
    tid        INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    oid        INT(8) UNSIGNED NOT NULL DEFAULT '0',
    rid        INT(8) UNSIGNED NOT NULL DEFAULT '0',
    t_subject  VARCHAR(255)    NOT NULL,
    t_name     VARCHAR(255)    NOT NULL,
    t_posttime INT(10)         NOT NULL DEFAULT '0',
    t_edittime INT(10)         NOT NULL DEFAULT '0',
    t_post     TEXT,
    t_pass     VARCHAR(32)              DEFAULT NULL,
    t_ip       VARCHAR(15)              DEFAULT NULL,
    t_uid      INT(8) UNSIGNED NOT NULL DEFAULT '0',
    PRIMARY KEY (tid),
    KEY rid (rid),
    FULLTEXT KEY s_search (t_subject),
    FULLTEXT KEY p_search (t_post)
)
    ENGINE = ISAM;

CREATE TABLE treebbs_count (
    t_date  INT(8) UNSIGNED NOT NULL DEFAULT '0',
    t_count INT(10)         NOT NULL DEFAULT '0',
    PRIMARY KEY (t_date)
)
    ENGINE = ISAM;
