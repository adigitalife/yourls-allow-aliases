#Allow aliases for YOURLS

This plugin allows YOURLS to work with alias hostnames for the server.  

This plugin is useful when you change the hostname of your server but you still want the old hostname/s to continue working (assuming the old hostname/s is/are still correctly configured in DNS).

It also allows you to use YOURLS with your server's IP address.

Instructions:

1. Copy the 'allow-aliases' folder to user/plugins/.
2. Activate the plugin in the YOURLS admin interface.

That's it.

Example use case:

1. Old hostname was toolong.hostname.com
2. Hostname changed to sho.rt (toolong.hostname.com still in DNS)
3. Install and activate the allow-aliases plugin
4. The following should now work:
    * `http://sho.rt/yourls`
    * `http://toolong.hostname.com/yourls`
    * `http://<IP address>/yourls`
    * `http://<any other alias>/yourls`
