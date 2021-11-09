#!/usr/bin/env python3
import time
import os

from selenium.webdriver import Chrome
from selenium.webdriver.chrome.options import Options
from selenium.common.exceptions import TimeoutException, WebDriverException



TIMEOUT = 3

def browse(url_path):
    options = Options()
    options.headless = True
    options.add_argument('--headless')
    options.add_argument('--no-sandbox')  # https://stackoverflow.com/a/45846909
    options.add_argument('--disable-dev-shm-usage')  # https://stackoverflow.com/a/50642913
    options.add_argument('--disable-gpu')
    chrome = Chrome(options=options)
    # https://stackoverflow.com/a/47695227
    chrome.set_page_load_timeout(TIMEOUT)
    chrome.set_script_timeout(TIMEOUT)

    # login
    base_url = 'http://h4ck3r.quest:8800/'
    chrome.get(base_url)
    chrome.find_element_by_name('username').send_keys('admin')
    chrome.find_element_by_name('password').send_keys(os.getenv('PASSWORD'))
    chrome.find_element_by_tag_name('button').click()

    # visit
    chrome.get(url_path)

    time.sleep(TIMEOUT)
    chrome.quit()
