# Use the official PostgreSQL image as a base
FROM postgres:latest

# Set environment variables for the database initialization
ENV POSTGRES_DB=${DB_DATABASE}
ENV POSTGRES_USER=${DB_USERNAME}
ENV POSTGRES_PASSWORD=${DB_PASSWORD:-secret}

# Copy the SQL file to the docker-entrypoint-initdb.d directory
COPY init.sql /docker-entrypoint-initdb.d/

# Ensure the SQL file is executed with the correct permissions
RUN chmod 644 /docker-entrypoint-initdb.d/init.sql
