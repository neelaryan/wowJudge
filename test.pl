#!/usr/bin/perl
system("uptime 1>/tmp/tmp-log-process-c 2>&1");
open(fileHandler, "/tmp/tmp-log-process-c");
while($line = <fileHandler>) {
	print $line;
}
close(fileHandler)
