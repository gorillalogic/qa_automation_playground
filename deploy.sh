docker-compose down -v --rmi all && docker-compose up -d
sleep 10
echo "Restoring the database..."
cat backup.sql | docker exec -i $(docker ps | grep -i automation_playground_db | awk '{print $1}') /usr/bin/mysql -u root --password=wordpress wordpress