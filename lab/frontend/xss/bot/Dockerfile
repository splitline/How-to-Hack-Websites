FROM python:3.8

RUN apt update
RUN apt install -f -y --no-install-recommends chromium chromium-driver redis-server
RUN pip3 install selenium redis rq

COPY xssbot.py /xssbot.py
COPY run.sh /run.sh
RUN chmod +x /run.sh
RUN useradd --no-create-home --home-dir / --shell /bin/false user

USER user
CMD /run.sh