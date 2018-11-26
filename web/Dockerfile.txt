FROM centos
MAINTAINER generydey@gmai.com

RUN yum -y --setopt=tsflags=nodocs update && \
    yum -y --setopt=tsflags=nodocs install httpd && \
    yum -y --setopt=tsflags=nodocs install php php-mysql php-gd php-mbstring php-xml && \
    yum -y --setopt=tsflags=nodocs install git && \
    yum clean all

ADD config /root/.ssh/config
ADD id_rsa /root/.ssh/id_rsa
ADD run-httpd.sh /run-httpd.sh
RUN chmod +x /run-httpd.sh && chmod -Rf 600 /root/.ssh

EXPOSE 80

CMD ["/run-httpd.sh"]
