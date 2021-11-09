#!/usr/bin/env bash
redis-server --protected-mode no &
for _ in {1..4}; do
  rq worker &
done
sleep infinity
