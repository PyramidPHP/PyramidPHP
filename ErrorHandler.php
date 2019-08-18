<?php declare(strict_types=1);



class ErrorHandler
{

    public function __construct()
    {
        return self;
    }

    public function setErrorHandler(): void
    {
        set_error_handler([$this, 'errorHandler']);
    }

    /*
     * TODO: set return type hint if possible
     */
    private function errorHandler(int $errorType, string $message, string $file, int $line)
    {
        $exceptionCode = $errorType;
        
        switch ($errorType) {
            case E_ERROR:
                throw new ErrorException            ($message, $exceptionCode, $errorType, $file, $line);
            case E_WARNING:
                throw new WarningException          ($message, $exceptionCode, $errorType, $file, $line);
            case E_PARSE:
                throw new ParseException            ($message, $exceptionCode, $errorType, $file, $line);
            case E_NOTICE:
                throw new NoticeException           ($message, $exceptionCode, $errorType, $file, $line);
            case E_CORE_ERROR:
                throw new CoreErrorException        ($message, $exceptionCode, $errorType, $file, $line);
            case E_CORE_WARNING:
                throw new CoreWarningException      ($message, $exceptionCode, $errorType, $file, $line);
            case E_COMPILE_ERROR:
                throw new CompileErrorException     ($message, $exceptionCode, $errorType, $file, $line);
            case E_COMPILE_WARNING:
                throw new CoreWarningException      ($message, $exceptionCode, $errorType, $file, $line);
            case E_USER_ERROR:
                throw new UserErrorException        ($message, $exceptionCode, $errorType, $file, $line);
            case E_USER_WARNING:
                throw new UserWarningException      ($message, $exceptionCode, $errorType, $file, $line);
            case E_USER_NOTICE:
                throw new UserNoticeException       ($message, $exceptionCode, $errorType, $file, $line);
            case E_STRICT:
                throw new StrictException           ($message, $exceptionCode, $errorType, $file, $line);
            case E_RECOVERABLE_ERROR:
                throw new RecoverableErrorException ($message, $exceptionCode, $errorType, $file, $line);
            case E_DEPRECATED:
                throw new DeprecatedException       ($message, $exceptionCode, $errorType, $file, $line);
            case E_USER_DEPRECATED:
                throw new UserDeprecatedException   ($message, $exceptionCode, $errorType, $file, $line);
        }
    }

}


class WarningException              extends ErrorException {}
class ParseException                extends ErrorException {}
class NoticeException               extends ErrorException {}
class CoreErrorException            extends ErrorException {}
class CoreWarningException          extends ErrorException {}
class CompileErrorException         extends ErrorException {}
class UserErrorException            extends ErrorException {}
class UserWarningException          extends ErrorException {}
class UserNoticeException           extends ErrorException {}
class StrictException               extends ErrorException {}
class RecoverableErrorException     extends ErrorException {}
class DeprecatedException           extends ErrorException {}
class UserDeprecatedException       extends ErrorException {}