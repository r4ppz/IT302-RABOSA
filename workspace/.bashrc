# ~/.bashrc - custom bash configuration for the workspace container
export PS1='\[\e[32m\]\u@workspace\[\e[0m\]:\[\e[34m\]\w\[\e[0m\]\$ '

alias ll='ls -lah'
alias la='ls -la'
alias art='php artisan'
alias composer='composer --ansi'
alias mysql='mysql --no-auto-rehash'

echo "Welcome to the IT302-RABOSA workspace container"
echo "Available tools: php, composer, git, node, npm, mysql, redis-cli"
