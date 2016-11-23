#!/bin/bash
set -e

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" <<-EOSQL
    CREATE USER crediwire;
    CREATE DATABASE crediwire;
    GRANT ALL PRIVILEGES ON DATABASE crediwire TO crediwire;
EOSQL