echo "This script should run as root user: sudo su, otherwise there could be a permissions issue connecting to the docker container to update the IP."
docker-compose -f docker-compose-aws.yml down -v --rmi all && docker-compose -f docker-compose-aws.yml up -d
echo "Restoring the database in 20 secs..."
sleep 20
sed -i "s/0.0.0.0:8085/52.14.147.231/g" backup.sql
cat backup.sql | docker exec -i $(docker ps | grep -i automation_playground_db | awk '{print $1}') /usr/bin/mysql -u root --password=wordpress wordpress