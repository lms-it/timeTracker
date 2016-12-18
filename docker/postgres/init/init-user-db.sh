#!/bin/bash
set -e

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" <<-EOSQL
    CREATE USER crediwire;
    CREATE DATABASE crediwire;
    GRANT ALL PRIVILEGES ON DATABASE crediwire TO crediwire;
    CREATE TABLE web_origins (
    client_id character varying(36) NOT NULL,
    value character varying(255)
    );
EOSQL