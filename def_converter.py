import subprocess


def tokens():
    container_id = subprocess.check_output("docker ps | grep converter | awk '{print $1}'", shell=True).strip()
    o = subprocess.check_output(['docker', 'exec', container_id, 'cat', '/var/www/html/defenseflag.txt']).strip()
    return set(o.split("\n"))


