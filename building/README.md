# QA Automation Playground
In this folder we have docker files to generate the docker images from scratch if necesary.

## Commands to build the images and container from scratch
Let's supose we are in the root folder of this repository.
```bash
cd qa_automation_playground/building
docker-compose -f docker-compose_build.yml down -v --rmi all && docker-compose -f docker-compose_build.yml up -d
```

- After that open a browser and go to http://0.0.0.0:8085/. 
- You will see a configuration page for wordpress to setup the language, site name, username, password, and others, fill all required fields and continue.
- Continue with all the configuration for woocommerce site, add plugins, define a template, etc.

## Database
### Backup
Once all your configurations are done, you can dump the database to save the information and reuse it in the future.
```bash
docker exec CONTAINER /usr/bin/mysqldump -u root --password=wordpress wordpress > backup.sql

Where CONTAINER is the id of the database container (you can see the id running `docker ps` command)
```

### Restore
If you have an existing database backup, and you want to restore, then use the following command.
```bash
cat backup.sql | docker exec -i CONTAINER /usr/bin/mysql -u root --password=wordpress wordpress

Where CONTAINER is the id of the database container (you can see the id running `docker ps` command)
```