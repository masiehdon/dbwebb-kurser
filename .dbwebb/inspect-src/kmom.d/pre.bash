#!/usr/bin/env bash
#
# Script run BEFORE kmom specific scripts.
# Put tests here that applies to all kmoms.
#
# Available (and usable) data:
#   $COURSE
#   $KMOM
#   $ACRONYM
#   $REDOVISA_HTTP_PREFIX
#   $REDOVISA_HTTP_POSTFIX
#   $LOG_DOCKER
#   eval "$BROWSER" "$url" &
#   openUrl "$url"
#   openSpecificUrl "$DIR" "me/redovisa" "build/coverage/index.html"
#
#printf ">>> -------------- Pre (all kmoms) ----------------------\n"

# Open log
echo "[$ACRONYM/$COURSE/$KMOM]" > "$LOG_DOCKER"

# Do different things depending on kmom
#localRepoUrl="http://127.0.0.1:18080/gui-repo"

#studentServerUrl="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/me"
#w3cValidatorUnicorn="https://validator.w3.org/unicorn/check?ucn_task=conformance\&ucn_uri"
#w3cValidatorHTML="https://validator.w3.org/check?uri"
#w3cValidatorCSS="https://jigsaw.w3.org/css-validator/validator?uri"

case $KMOM in
    kmom01)
        #openUrl "$w3cValidatorUnicorn=$studentServerUrl/report/public/me.php"
        #openUrl "$w3cValidatorHTML=$studentServerUrl/report/public/me.php"
        #openUrl "$w3cValidatorCSS=$studentServerUrl/report/public/me.php"
        #openUrl "$studentServerUrl/report/public/me.php"
        #openUrl "$studentServerUrl/report/public/today.php"
    ;;
    kmom02)
        #openUrl "$w3cValidatorUnicorn=$studentServerUrl/report/public/about.php"
        #openUrl "$w3cValidatorHTML=$studentServerUrl/report/public/about.php"
        #openUrl "$w3cValidatorCSS=$studentServerUrl/report/public/about.php"
        #openUrl "$studentServerUrl/report/public/me.php"
    ;;
    kmom03)
        #openUrl "$w3cValidatorUnicorn=$studentServerUrl/report/public/month.php"
        #openUrl "$w3cValidatorHTML=$studentServerUrl/report/public/month.php"
        #openUrl "$w3cValidatorCSS=$studentServerUrl/report/public/month.php"
        #openUrl "$studentServerUrl/report/public/friday.php"
        #openUrl "$studentServerUrl/report/public/friday.php?date=2022-08-26"
        #openUrl "$studentServerUrl/report/public/month.php"
    ;;
    kmom04)
        #openUrl "$w3cValidatorUnicorn=$studentServerUrl/report/public/photocal.php"
        #openUrl "$studentServerUrl/report/public/session.php"
        #openUrl "$studentServerUrl/report/public/photocal.php"
        #openUrl "$studentServerUrl/report/public/guessname.php"
    ;;
    kmom05)
        #openUrl "$w3cValidatorUnicorn=$studentServerUrl/report/public/search.php"
        #openUrl "$studentServerUrl/report/public/name.php"
        #openUrl "$studentServerUrl/report/public/name.php?query=NO_NAME"
        #openUrl "$studentServerUrl/report/public/name.php?query=Mikael"
        #openUrl "$studentServerUrl/report/public/search.php"
    ;;
    kmom06)
        #openUrl "$w3cValidatorUnicorn=$studentServerUrl/report/public/report.php"
        #openUrl "$studentServerUrl/report/public/me.php"
    ;;
    kmom10)
        #openUrl "$studentServerUrl/proj/public/home.php"
        #openUrl "$w3cValidatorUnicorn=$studentServerUrl/proj/public/home.php"
    ;;
esac

#openUrl "$studentServerUrl/report/public/report.php#$KMOM"

# # Rsync the target dir/repo to a temp space
# install -d gui-repo/
# rm -rf gui-repo/{*,.??*}
# rsync -a --delete $REPO/ gui-repo/
