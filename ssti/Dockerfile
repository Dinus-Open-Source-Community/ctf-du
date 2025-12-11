# Use official Python image as base
FROM python:3.9-slim

# Set environment variables
ENV PYTHONDONTWRITEBYTECODE=1
ENV PYTHONUNBUFFERED=1
ENV FLASK_APP=app.py
ENV FLASK_ENV=production
ENV FLAG=DOSCOM{5uCc355fuL_SST1_3xpl01t_ma5t3r}

# Create directory and set working directory
WORKDIR /app

# Install system dependencies
RUN apt-get update && \
    apt-get install -y --no-install-recommends gcc python3-dev && \
    rm -rf /var/lib/apt/lists/*

# Copy requirements and install Python dependencies
COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

# Copy application code
COPY . .

# Create flag file dengan format yang benar
RUN echo "$FLAG" > /flag.txt && \
    chmod 644 /flag.txt && \
    chown root:root /flag.txt

# Security hardening
RUN chmod -R o-rwx /app && \
    adduser --disabled-password --gecos '' ctfuser && \
    chown -R ctfuser:ctfuser /app

# Switch to non-root user
USER ctfuser

# Expose the port the app runs on
EXPOSE 5000

# Command to run the application
CMD ["flask", "run", "--host=0.0.0.0"]
